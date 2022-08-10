<?php

namespace App\Screens\Other;

use App\Screens\BaseScreen;

class Intro extends BaseScreen
{
    public function render()
    {
        $this->info("The year is ", true);
        $this->success("9840", true);
        $this->info(". Earth's no more.");
        $this->info("Aboard the ", true);
        $this->warning("SS-Titan ", true);
        $this->info("you, and 2 million other survivors, wander the depths of space.");
        $this->info("Gravity was finally stabilized. It has been two months since the incident. You cheer,");
        $this->info("as your feet touches the white room's floor. Feeling your weight after so much time");
        $this->info("seems unreal. You've dreamt of this day for weeks. After a couple of seconds, the");
        $this->info("radio starts playing:");
        $this->newLine();
        $this->debug("- ATTENTION, CITIZENS OF TITAN. GRAVITY HAS BEEN RESTABILISHED. BEWARE OF HIGH SPOTS.");
        $this->debug("YOUR WEIGHT WILL BE UNSTABLE FOR THE NEXT FEW HOURS.");
        $this->newLine();
        $this->info("The voice was ", true);
        $this->success("Commander Shu's", true);
        $this->info(". You feel relief and peace as her words travels through");
        $this->info("your ears. Shu may not be the most courageous person, but her perseverance and kindness");
        $this->info("earned people's love. In the last election, her flagship was the project to turn more");
        $this->info("than 30% ofthe ship's waste into energy. Listening and meeting most of Titan's scientists");
        $this->info("gave Shu a special fame around them, making more propitious the surge new technologies.");
        $this->info("WasteNot™ Factory. With it, Shu won the last two elections. A giant robotic-ish factory");
        $this->info("that absorves carbon dioxides and turns into clean energy. Since inauguration, it calmed");
        $this->info("down economy's inflation by providing free energy for the needed. Everything about this");
        $this->info("project is extremely classified.");
        $this->debug('');
        readline('Press any key to continue...');
        $this->newLine();
        $this->warning(str_repeat('-', MAX_WIDTH));
        $this->warning('WARNING: ', true);
        $this->warning('M A I N F R A M E  I N V A S I O N  D E T E C T E D!');
        $this->warning(str_repeat('-', MAX_WIDTH));
        $this->newLine();
        $this->info("All screens around you blink red. Sirens echo through the ship. You feel something's off.");
        $this->newLine();
        $this->success("<PLACE> ", true);
        $this->info("YOU'RE IN YOUR ROOM.");
        $this->debug("<DOOR> ", true);
        $this->info("YOUR ROOM'S DOOR IS CLOSED IN FRONT OF YOU.");
        $this->extra("<EXTRA> ", true);
        $this->info("YOUR ROOM HAS A BED, A WARDROBE AND A DESK WITH A LAPTOP");
        $this->newLine();
        $this->info("What do you do?");
        $option = readline('');
        $this->newLine();

        $explodedOption = explode(" ", $option);

        if (sizeof($explodedOption) != 2) {
            $this->warning('Wrong arguments for action. Please, always use two words! Ex.: open door');
            $this->warning('For seemingly impossible two worded decisions, please use numbers! Ex.: open door3');
            exit_run();
        }

        $action = $explodedOption[0];
        $target = $explodedOption[1];

        if (in_array($action, ['kill', 'destroy', 'punch', 'kick', 'fuck'])) {
            $this->warning('Too soon, man, too soon...');
            exit_run();
        }

        if ($action == 'open') {
            if ($target == 'door') {
                $this->info("Nice move! You just exited your room and everything's fine!");
                $this->newLine();
                $GLOBALS['character']->addExperience(10);
                $this->success($GLOBALS['character']->name." just won 10 xp!");
                $this->newLine();
                $this->warning('Unfortunately, this is the full game! Thanks for playing!');
                exit_run();
            }
        }
    }
}