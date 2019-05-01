<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//added for time
use Illuminate\Support\Carbon;

class SurveyController extends Controller
{
    //
    public function SendCheckInInfo()
    {

    	$survey = collect();
    	
    	//General survey stuff
    	//survey type
    	$survey->put('type', 'CheckIn');

    	//page list
    	$pages = collect([
    		collect([
    			//intro page
    			'name'=>'Introduction',
    			'order'=>1,
    		]),
    		collect([
    			//
    			'name'=>'My Body',
    			'order'=>2,
    		]),
    		collect([
    			'name'=>'My Mindset',
    			'order'=>3,
    		]),
    		collect([
    			'name'=>'My Skiing',
    			'order'=>4,
    		]),
    		collect([
    			'name'=>'Goals',
    			'order'=>5,
    		]),
    	]);
    	$survey->put('pages', $pages);

    	//for each page determine type and get needed info
    	foreach ($pages as $key => $page) {
    		# code...
    		//Intro Page
    		if ($page['name'] == "Introduction")
    		{
				//event type
    			$page->put('event_type', 'Training');
				//discipline
				$page->put('discipline', 'SL');
				//date
				$time = Carbon::now();
				$page->put('date', $time);
				//focuses
				$page->put('focuses', ['Ankle flexion','Execute inspection plan','Movement']);
				//Pre practice notes
				$page->put('notes', 'Hi all, day 2 we will progress things a bit...Still focusing on basic speed athletic position to allow good ankle flexion and shin pressure at top of turn. We will run full course from the top so longer run and some full suit runs...Good tuck position and gliding skills are also key on flatter sections like the top and towards the bottom...');
				//last discipline day
				$lastDay = collect([]);
					
				//event type
				$lastDay->put('type', 'Training');
	    		//discipline
				$lastDay->put('discipline', 'SL');
		    	//date
	    		$time = Carbon::now()->subDays(20);
				$lastDay->put('date', $time);
	    		//focuses
	    		$lastDay->put('focuses', ['Ankle flexion','Edge angle']);
				//my focus today was answer
				$lastDay->put('focus_today_answer',"The finer points of pole plant.");
				//how could I be be better today answer
				$lastDay->put('better_today_answer',"I could have been more agressive in my turns.");
				//checkin status
				$lastDay->put('checkin_status',true);
				//checkout status
				$lastDay->put('checkout_status',true);
				//goal status
				$lastDay->put('goal_status',true);
				//top badges
				$lastDay->put('top_badges', ['high_focus','low_energy','high_confidence']);


				//put into page
				$page->put('last_day', $lastDay);
					 
			}

    		//My Body
			elseif ($page['name'] == "My Body")
			{
    		//list of questions
				$questions = collect([

					//Energy
					[
						//id
						'id'=>1,
						//question type
						'type'=>'metric',
		    			//question
		    			'question'=>'How is your energy level?',
		    			//question words/scale
		    			'scale'=> [
		    				1=>'Terrible',
		    				2=>'Bad' ,
		    				3=>'Meh' ,
		    				4=>'Good',
		    				5=>'Great'
		    			],//might not need to be a Map, play around with it if you want.
		    			//question icons
		    			'icons'=> [
		    				'small'=>'Battery_empty',
		    				'middle'=>'Battery_half',
		    				'big'=>'Battery_full',
		    			],
		    			//parent question
		    			'parent_question_id'=> NULL,
		    			//trigger answer
		    			'trigger_answer'=> NULL,
		    			//char limit
		    			'limit'=>140
					],

					//Nutrition
					[
						//id
						'id'=>2,
						//question type
						'type'=>'boolean',
		    			//question
		    			'question'=>'Did I eat right and drink enough water this morning?',
		    			//question words/scale
		    			'scale'=> [
		    				1=>'Yes',
		    				0=>'No' ,
		    			],
		    			//question icons
		    			'icons'=> NULL,
		    			//parent question
		    			'parent_question_id'=> NULL,
	    				//trigger answer
		    			'trigger_answer'=> NULL,
		    			//char limit
		    			'limit'=> NULL
					],
					[
						//id
						'id'=>3,
						//question type
						'type'=>'followup',
		    			//question
		    			'question'=>'Why didn’t you eat right?',
		    			//question words/scale
		    			'scale'=> NULL,
		    			//question icons
		    			'icons'=> NULL,
		    			//parent question
		    			'parent_question_id'=> 2,
	    				//trigger answer
	    				'trigger_answer'=> 0,
		    			//char limit
		    			'limit'=> 140
					]

				]);
				$page->put('questions', $questions);
    			
    		}

    		//My Mindset
    		elseif ($page['name'] == "My Mindset")
			{
    		//list of questions
				$questions = collect([

					//personal
					[
						//id
						'id'=>4,
						//question type
						'type'=>'boolean',
		    			//question
		    			'question'=>'Is there anything personal you think the coach should know today?',
		    			//question words/scale
		    			'scale'=> [
		    				1=>'Yes',
		    				0=>'No' ,
		    			],
		    			//question icons
		    			'icons'=> NULL,
		    			//parent question
		    			'parent_question_id'=> NULL,
	    				//trigger answer
		    			'trigger_answer'=> NULL,
		    			//char limit
		    			'limit'=> NULL
					],
					[
						//id
						'id'=>5,
						//question type
						'type'=>'followup',
		    			//question
		    			'question'=>'What do you want to tell them?',
		    			//question words/scale
		    			'scale'=> NULL,
		    			//question icons
		    			'icons'=> NULL,
		    			//parent question
		    			'parent_question_id'=> 4,
	    				//trigger answer
	    				'trigger_answer'=> 1,
		    			//char limit
		    			'limit'=> 140
					],

					//Focus
					[
						//id
						'id'=>6,
						//question type
						'type'=>'metric',
		    			//question
		    			'question'=>'How focused are you today?',
		    			//question words/scale
		    			'scale'=> [
		    				1=>'Terrible',
		    				2=>'Bad' ,
		    				3=>'Meh' ,
		    				4=>'Good',
		    				5=>'Great'
		    			],
		    			//question icons
		    			'icons'=> [
		    				'small'=>'Bullseye_empty',
		    				'middle'=>'Bullseye_half',
		    				'big'=>'Bullseye_full',
		    			],
		    			//parent question
		    			'parent_question_id'=> NULL,
		    			//trigger answer
		    			'trigger_answer'=> NULL,
		    			//char limit
		    			'limit'=>140
					],

					//Confidence
					[
						//id
						'id'=>7,
						//question type
						'type'=>'metric',
		    			//question
		    			'question'=>'How confident are you feeling this morning?',
		    			//question words/scale
		    			'scale'=> [
		    				1=>'Terrible',
		    				2=>'Bad' ,
		    				3=>'Meh' ,
		    				4=>'Good',
		    				5=>'Great'
		    			],
		    			//question icons
		    			'icons'=> [
		    				'small'=>'Brain_empty',
		    				'middle'=>'Brain_half',
		    				'big'=>'Brain_full',
		    			],
		    			//parent question
		    			'parent_question_id'=> NULL,
		    			//trigger answer
		    			'trigger_answer'=> NULL,
		    			//char limit
		    			'limit'=>140
					]

				]);
				$page->put('questions', $questions);
    			
    		}
    		//My Skiing
    		elseif ($page['name'] == "My Skiing")
			{
    		//list of questions
				$questions = collect([

					//personal
					[
						//id
						'id'=>8,
						//question type
						'type'=>'boolean',
		    			//question
		    			'question'=>'Is your equipment ready for today?',
		    			//question words/scale
		    			'scale'=> [
		    				1=>'Yes',
		    				0=>'No' ,
		    			],
		    			//question icons
		    			'icons'=> NULL,
		    			//parent question
		    			'parent_question_id'=> NULL,
	    				//trigger answer
		    			'trigger_answer'=> NULL,
		    			//char limit
		    			'limit'=> NULL
					],
					[
						//id
						'id'=>9,
						//question type
						'type'=>'followup',
		    			//question
		    			'question'=>'Why isn’t your equipment ready?',
		    			//question words/scale
		    			'scale'=> NULL,
		    			//question icons
		    			'icons'=> NULL,
		    			//parent question
		    			'parent_question_id'=> 8,
	    				//trigger answer
	    				'trigger_answer'=> 0,
		    			//char limit
		    			'limit'=> 140
					]
				]);
				$page->put('questions', $questions);
    			
    		}
    		//list of questions
    			//question type
    			//question
    			//question words/scale
    			//question icons
    				//small, middle, big
    			//parent question
    				//trigger answer
    			//char limit
    		//My Goals
    		elseif ($page['name'] == "Goals")
    		{
    			//list of premade goals
    			$goals = collect([
    				1=>'Do something that scares you (feel it, act on it).',
    				2=>'Focus on the process and not the outcomes.',
    				3=>'Use positive self-talk after a bad run.',
    				4=>'Keep it simple - pick one cue to focus on.',
    				5=>'Eat an athlete’s lunch.',
    			]);
    			$page->put('goals', $goals);

    		}
    		
    	//My Virtues
    		//List of Virtues
    	}
    	dd($survey);
    	return view('testing', ['survey' => $survey]);
    }
}
