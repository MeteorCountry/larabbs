<?php

namespace App\Observers;

use App\Http\Requests\Request;
use App\Models\Reply;
use App\Notifications\TopicReplied;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function created(Reply $reply)
    {
        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();
        $reply->topic->user->notify(new TopicReplied($reply));
    }
    public function creating(Reply $reply)
    {
//        暂不处理 xss
//        $reply->content = clean($reply->content, 'user_topic_body');
    }
}
