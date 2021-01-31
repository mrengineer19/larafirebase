<?php

namespace Kutia\Larafirebase\Messages;

use Kutia\Larafirebase\Facades\Larafirebase;

class FirebaseMessage
{
    private $title;
    
    private $body;

    private $clickAction;

    private $image;

    private $fromArray;

    public function withTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function withBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function withClickAction($clickAction)
    {
        $this->clickAction = $clickAction;

        return $this;
    }

    public function withImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function fromArray($fromArray)
    {
        $this->fromArray = $fromArray;

        return $this;
    }

    public function asNotification($deviceTokens)
    {
        if ($this->fromArray) {
            return Larafirebase::fromArray($this->fromArray)->sendNotification($deviceTokens);
        }

        return Larafirebase::withBody($this->body)
            ->withImage($this->image)
            ->withClickAction($this->clickAction)
            ->sendNotification($deviceTokens);
    }

    public function asMessage($deviceTokens)
    {
        if ($this->fromArray) {
            return Larafirebase::fromArray($this->fromArray)->sendMessage($deviceTokens);
        }

        return Larafirebase::withBody($this->body)
            ->withImage($this->image)
            ->withClickAction($this->clickAction)
            ->sendMessage($deviceTokens);
    }
}
