<?php

namespace App\Listeners;

use App\Models\Inquiry;
use App\Events\InquiryRegistered;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryRegistered as InquiryRegisteredMail;

class SendInquiryRegisteredNotification
{
    /**
     * Handle the event.
     */
    public function handle(InquiryRegistered $event): void
    {
        $pdf = $this->toPDF($event->inquiry);
        $mail = new InquiryRegisteredMail($event->inquiry, $pdf);
        Mail::send($mail);
    }

    /**
     * Convert an inquiry instance into a PDF document
     *
     * @param Inquiry $inquiry
     * @return string
     */
    protected function toPDF(Inquiry $inquiry)
    {
        $pdf = new \TCPDF();

        $pdf->AddPage();
        $content = view(
            'documents.inquiry',
            [
                'author_name' => $inquiry->author_name,
                'author_email' => $inquiry->author_email,
                'author_phone' => $inquiry->author_phone,
                'message' => $inquiry->message
            ]
        )->render();
        $pdf->WriteHTML($content);

        ob_start();
        $pdf->Output();
        return ob_get_clean();
    }
}
