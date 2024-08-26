<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if ($message == 'hi') {
                $this->askUserProblem($botman);
            }
            
            else{
                $botman->reply("Start a conversation by saying hi.");
            }
   
        });
   
        $botman->listen();
    }
   
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('Nice to meet you '.$name);
        });
    }
    public function askUserProblem($botman)
    {
        $botman->ask('Can you please describe the problem you are facing?', function (Answer $answer) {
            $problemDescription = $answer->getText();

            // Process the problem and provide a solution (you can customize this logic)
            $solution = $this->getSolutionForProblem($problemDescription);

            // Send the solution to the user
            $this->say('I understand that you are facing an issue. Here is a possible solution:');
            $this->say($solution);

            // Optionally, ask if the solution resolved the problem
            $this->askForFeedback($botman);
        });
    }

    public function getSolutionForProblem($problemDescription)
    {
        // Implement your logic to determine the solution based on the problem description
        // This is a placeholder, replace it with your actual logic
        return 'This is a placeholder solution. Replace it with the actual solution for the given problem.';
    }

    public function askForFeedback($botman)
    {
        $botman->ask('Did the solution resolve your problem? (Yes/No)', function (Answer $answer) use ($botman) {
            $feedback = strtolower($answer->getText());

            if ($feedback === 'yes') {
                $this->say('I\'m glad to hear that! If you have any more questions or issues, feel free to ask.');
            } else {
                $this->say('I\'m sorry to hear that. Let me know if there\'s anything else I can assist you with.');
            }
        });
    }
    
}
