<!-- Name: Coachable Survey Testing
     Author: Trevor Allain
     Date: May 9, 2019
     Notes/Descr: This is the VERY rough outline for the survey component. I understand that at this point its modularity is fairly limited.
     However, I am porting it over to a proper .vue project with appropriate organization. Currently, I've just dumped everything in one file to test out
     some of the functionality of Vue and learning how to use the Laravel testing environment, etc.

     Current Status: 
        1. Got a good library going for the progress bar, just got to implement the actual logic.
        2. Moving between pages is pretty good, still need to ensure return to top of page on navigation.
        3. Got a decent template for the 'scale' (Good, Bad, Meh, etc).
        4. Got a good handle now on the overall design of the survey. Once the templating is done it shouldn't be hard to port everything over
           and make the whole survey nice and clean.
    
    Final Thoughts:
        After our chat I started working on getting everything over to a proper .Vue project. I'll continue working on that.
-->


<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <!-- Various imported scripts  -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> <!-- vue -->
        <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>  <!-- vuetify -->
        <script src="http://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>  <!-- bootstrap -->
        <script src="http://unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>  <!-- fill -->
        <script src="https://cdn.jsdelivr.net/npm/vue-scrollto"></script>  <!-- scroll to for better scrolling -->
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css"> <!-- Imported but not used...yet -->
        <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
        <link href="http://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css" rel="stylesheet"/>
        <link href="http://unpkg.com/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- TODO: dynamically import type (Check in vs Check out) -->
        <title>Check In</title>

        <!-- Styles -->
        <style>
            
        </style>

    </head>

    <body>

        <!-- Main div for app -->
        <div id="app"  >

            <!-- Navbar at the top of screen TODO: centre it! -->       
            <div class="text-center" id="top">

                <b-navbar class="header" type="dark" variant="info" fixed="top">

                    <b-navbar-brand href="#">Check In</b-navbar-brand>

                </b-navbar>

            </div>

            <!-- Used vuetify for some cool travelling between 'pages' -->
            <v-app>
           
                <v-content>

                    <v-container >
                       
                        <br>

                        <v-stepper v-model="step" vertical > <!-- Scroll to top is working after clicking 'Previous' and 'Next' -->

                            <!-- total pages with headers - used to step back and forth -->
                            <!-- TODO: template based on total pages -->
                            <v-stepper-header> Check In

                                <v-stepper-step step="1" :complete="step > 1">
                                    
                                    @{{survey.pages[0].name}} <!-- TODO: figure out a way to get page names better -->

                                </v-stepper-step>

                                <v-divider></v-divider>

                                <v-stepper-step step="2" :complete="step > 2">

                                    @{{survey.pages[1].name}}

                                </v-stepper-step>

                                <v-divider></v-divider>

                                <v-stepper-step step="3" :complete="step > 3">

                                    @{{survey.pages[2].name}}

                                </v-stepper-step>

                                <v-divider></v-divider> 
                                
                                <v-stepper-step step="4" :complete="step > 4">

                                    @{{survey.pages[3].name}}

                                </v-stepper-step>

                                <v-divider></v-divider>

                                <v-stepper-step step="5" :complete="step > 5">

                                    @{{survey.pages[4].name}}

                                </v-stepper-step>

                                <v-divider></v-divider>

                            </v-stepper-header>
                            
                            <!-- Introduction -->
                            <v-stepper-content step="1">

                                Focus @{{survey.date}} <!-- TODO: align right and parse-->

                                <v-divider></v-divider>

                                <!-- temporary placement until templating -->                               
                                <v-btn outline color="blue">@{{survey.pages[0].focuses[0]}}</v-btn>
                                <v-btn outline color="blue">@{{survey.pages[0].focuses[1]}}</v-btn>
                                <v-btn outline color="blue">@{{survey.pages[0].focuses[2]}}</v-btn>

                                <v-divider></v-divider>

                                Coach's Plan <br> <!-- Had to hardcode since it wasn't in the controller -->

                                <v-text-field label="My focus today was..." v-model="survey.myFocus" required> <!-- Had to hardcode since it wasn't in the controller -->
                                </v-text-field>

                                <v-text-field label="To be a better ski racer I can..." v-model="survey.myImprovement" required> <!-- Had to hardcode since it wasn't in the controller -->
                                </v-text-field>

                                <!-- TODO: template buttons for 'next' and 'previous'-->
                                <v-btn v-scroll-to="'#top'" color="primary" @click.native="step = 2">Next</v-btn>

                            </v-stepper-content>

                           <!-- My Body -->
                            <v-stepper-content step="2" vertical>
                            
                                <p>@{{survey.pages[1].questions[0].question}}</p> <!-- template all below in future -->

                                <!-- Eventually template these buttons from json data -->
                                

                                <!-- Scale template for buttons --> 
                                <div v-for="n in 5" >
                                    <button-scale-template :scale-Text="$root.survey.questionScale[6 - n]"></button-scale-template>
                                </div>   

                                <v-divider id="bottom"></v-divider>

                                <p>@{{survey.foodWaterQuestion}}</p>

                                <div  v-for="n in 2" > <!-- TODO: dynamically get total number of scale choices -->
                                    <button-scale-template :scale-Text="$root.survey.binaryQuestionScale[2-n]"></button-scale-template>
                                </div>

                                <!-- TODO: template buttons -->
                                <v-btn v-scroll-to="'#top'" flat v-if="step > 0" @click.native="step--">Previous</v-btn>
                                <v-btn v-scroll-to="'#top'" color="primary" @click.native="step = 3">Next</v-btn>

                            </v-stepper-content>

                            <!-- My Mindset -->
                            <v-stepper-content step="3" vertical>

                                <p>What is your energy level?</p>
                                
                                <!-- The next set of divs are the buttons for scale (Good/Meh/Bad, etc) scale -->
                                <div v-for="n in 5" > <!-- TODO: dynamically get total number of scale choices -->
                                    <button-scale-template :scale-Text="$root.survey.questionScale[6 - n]"></button-scale-template>
                                </div>

                                <v-divider></v-divider>

                                <div v-for="n in 5" > <!-- TODO: dynamically get total number of scale choices -->
                                    <button-scale-template :scale-Text="$root.survey.questionScale[6 - n]"></button-scale-template>
                                </div>

                                <v-divider></v-divider>

                                <div v-for="n in 5" > <!-- TODO: dynamically get total number of scale choices -->
                                    <button-scale-template :scale-Text="$root.survey.questionScale[6 - n]"></button-scale-template>
                                </div>

                                <v-divider></v-divider>

                                <div  v-for="n in 2" > <!-- TODO: dynamically get total number of scale choices -->
                                    <button-scale-template :scale-Text="$root.survey.binaryQuestionScale[2-n]"></button-scale-template>
                                </div>

                                <p>Is there anything you want the coach to know today?</p>
                                <input type="text">  <br> <!-- TODO: get a better textbox with rounded edges -->

                                <v-btn v-scroll-to="'#top'" flat v-if="step > 0" @click.native="step-- ">Previous</v-btn>
                                <v-btn color="primary" @click.native="step = 4">Next</v-btn>

                            </v-stepper-content>

                        </v-stepper>

                        <!-- Basic progress bar. Just a placeholder, for now -->
                        <v-progress-linear v-model="progressBarPercentage"></v-progress-linear>

                    </v-container>

                </v-content>
                
            </v-app>

            <br/><br/>

            <!-- Debugging survey object -->
            Debug: @{{surveyJson}}
        </div>
        
        <script>
                        
            //vue component for scale template
            Vue.component('button-scale-template', {
                props: ['scaleText'],

                template: `
                    <div class="text-xs-center">
                        <v-btn outline color="blue" v-on:click="$root.getButtonValue($event)">@{{scaleText}}</v-btn>
                    </div>    
                `
            });

            //TODO: vue component for header template
            Vue.component('header-template', {

                props: ['title'],

                template: `

                `

            });
           
            //vue scrollTo import
            Vue.use(VueScrollTo);

            var app = new Vue({
                el: '#app',
                data: ()=>({
                    
                    step: 1,
                    jsonObject: {},
                    questionIndex: 0, //index for survey questions (might delete if not needed)
                    surveyJson: '{!!$survey!!}' , //survey object received from Controller
                    progressBarPercentage: 20,        
                    survey:{

                        pages: null, //total pages with corresponding values
                        checkIn: null, //checkIn vs checkOut value
                        pageTitle: null, //page title
                        myFocus: null, // typed focus
                        myImprovement: null, //typed improvement
                        myEnergyLevel: null, //selected energy level
                        questionScale: null,
                        binaryQuestionScale: null,
                        foodWaterQuestion: null,

                        //data pulled from SurveyController.php
                        title: '{{$survey['type']}}', //get type (probably not needed...?)
                        category: '@json($survey['pages']->pluck('name'))', //get name for categories

                        eventType: null,
                        discipline: null,
                        date: null,

                        //deprecated method of getting data from Controller -> will probably delete in
                        //favour of the json method above
                        introInfo: '@json($survey['pages']->where('name', 'Introduction'))',
                        myBodyInfo: '@json($survey['pages']->where('name', 'My Body'))',
                        focus:  '@json($survey['pages']->pluck('focuses'))',
                        myBodyQuestions:  '{{!!$survey['pages']->where('name', 'My Body')!!}}', 
                    }
                }),

                //parse object from controller in order to easily access attrributes    
                created: function(){

                    console.log('Parsing JSON...'); //console logging
                    
                    //parse object for easy access
                    this.jsonObject = JSON.parse(this.surveyJson);
                    this.survey.pages = this.jsonObject.pages; //pages object (holds all of the data for each page)
                    this.survey.date = this.jsonObject.pages[0].date; //date
                    this.survey.discipline = this.jsonObject.pages[0].discipline; //discipline
                    this.survey.eventType = this.jsonObject.pages[0].event_type; //event type
                    
                    var dateString = this.survey.date; //used to parse the date into something more readable
                    this.survey.date = dateString.slice(0, 10); //parse date string
                    this.survey.questionScale = this.jsonObject.pages[1].questions[0].scale; //Good/Bad/Meh scale
                    this.survey.binaryQuestionScale = this.jsonObject.pages[1].questions[2].scale; //Yes/No scale
                    this.survey.foodWaterQuestion = this.jsonObject.pages[1].questions[2].question; //Food and water question
                    
                    //logging various data to ensure its actually assigned properly
                    console.log(this.survey.date);
                    console.log(this.survey.pages);
                    console.log(this.survey.binaryQuestionScale[0]);
                },

                //moethods for vue    
                methods: {
                    submit() {
                        alert('Page submitted');
                    },

                    //test function, most likely not needed    
                    jsonParse: function() {
                        this.jsonObject = JSON.parse(this.survey.test);
                    },
                    
                    //get the value of the button that was pressed
                    getButtonValue: function(e){

                        const buttonValue = e.target.textContent; //get value of button text
                        console.log(buttonValue);
                        
                        this.survey.myEnergyLevel = buttonValue;

                        this.scrollHandle();

                    },

                    //The following two functions are most likely not needed
                    //but i've included them in case its easier to implement them    
                    next: function(){
                        this.questionIndex++;
                    },

                    previous: function(){
                        this.questionIndex--;
                    },

                    //Currently handles only moving to the bottom of the page (or whatever is tagged as 'bottom')
                    scrollHandle: function() {
                        VueScrollTo.scrollTo('#bottom', 500, { easing: 'linear', offset: -50 });
                        
                    },

                    //Currently handles only moving to the top of the page (or whatever is tagged as 'top')
                    //TODO: ensure offset is compatible with header size (doesn't overlap etc.)    
                    scrollTop: function() {
                        VueScrollTo.scrollTo('#top', 500, {easing: 'linear', offset: -500});
                    }

                }
            });    

        </script>

    </body>

</html>

