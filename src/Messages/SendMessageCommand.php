<?php

namespace Musonza\Chat\Messages;

use Illuminate\Database\Eloquent\Model;
use Musonza\Chat\Models\Conversation;

class SendMessageCommand
{
    public $body;
    public $conversation;
    public $type;
    public $participant;
    public $data;

    /**
     * @param Conversation $conversation The conversation
     * @param string       $body         The message body
     * @param Model        $sender       The sender identifier
     * @param string       $type         The message type
     * @param array|null   $data         The message data payload 
     */
    public function __construct(Conversation $conversation, $body, Model $sender, $type = 'text', $data = null)
    {
        $this->conversation = $conversation;
        $this->body = $body;
        $this->type = $type;
        $this->participant = $this->conversation->participantFromSender($sender);
        $this->data = $data;
    }
}
