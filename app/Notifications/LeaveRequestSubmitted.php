<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveRequestSubmitted extends Notification
{
    use Queueable;
    protected $leaveRequest;
    protected $status;

    public function __construct($leaveRequest)
    {
        $this->leaveRequest = $leaveRequest;
    }
    public function via($notifiable)
    {
        return ['database'];  // Add mail and database channels
    }

    public function toDatabase($notifiable)
    {
        return [
            'leave_request_id' => $this->leaveRequest->id ?? 'Unknown', // ضمان وجود ID
            'name' => optional($this->leaveRequest->user)->name ?? 'Unknown', // ضمان وجود اسم المستخدم
            'requested_at' => optional($this->leaveRequest->created_at)->format('Y-m-d H:i:s') ?? now()->format('Y-m-d H:i:s'),
        ];
    }




    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Leave Request Submitted')
            ->line('A new leave request has been submitted.')
            ->action('View Request', url('/requests'));
    }
}
?>
