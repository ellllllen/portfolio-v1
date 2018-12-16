<?php

namespace Ellllllen\ChatBot\BotMan;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Foundation\Inspiring;

class DefaultConversation extends Conversation
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return mixed|void
     */
    public function run()
    {
        $this->askName();
    }

    protected function askName()
    {
        $this->ask('Hello! What is your name?', function (Answer $answer) {

            $this->name = $answer->getText();
            $this->say('Nice to meet you ' . $this->name);

            $this->tellJoke();
        });
    }

    protected function tellJoke()
    {
        $question = Question::create($this->name . ", do you want to hear a joke?")->addButtons([
            Button::create('Yeppers!')->value('yes'),
            Button::create('No thanks!')->value('no'),
        ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'yes':
                        $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                        $this->say($joke->value->joke);
                        break;
                    case 'no':
                        $this->say('OK, I didn\'t feel like being funny anyways');
                        break;
                }
            }
        });

        $this->quote();
    }

    private function quote()
    {
        $question = Question::create("Do you want me to inspire you with a nice quote?")->addButtons([
            Button::create('Yeppers!')->value('yes'),
            Button::create('No thanks!')->value('no'),
        ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'yes':
                        $this->say(Inspiring::quote());
                        break;
                    case 'no':
                        $this->say('OK');
                        break;
                }
            }
        });

        $this->tellJoke();
    }
}