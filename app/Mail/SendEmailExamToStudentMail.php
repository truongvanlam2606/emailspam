<?php

namespace App\Mail;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailExamToStudentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $user;
    protected $exam;

    public function __construct(User $user, Exam $exam)
    {
        $this->user = $user;
        $this->exam = $exam;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = url('/') .'exams' .$this->exam->extend_id;

        return $this->from($this->user->email)
            ->view('email.admin.students.email_notification_exam')
            ->with([
                'user' => $this->user,
                'exam' => $this->exam,
                'link' => $link,
            ])
            ->subject('Notification Exam');
    }
}
