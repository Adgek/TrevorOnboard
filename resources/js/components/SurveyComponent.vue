<!-- This is the main component for the survey. It will
     eventually house all of the vue components for buttons and pages etc. 
-->

<template>

    <!-- Main div for app -->
    <div id="app" class="grey-background" >

        <!-- Navbar at the top of screen TODO: centre it! -->       
        <div id="top" >

            <b-navbar class="header"  fixed="top" >

                <b-navbar-brand class="heading-1-montserrat-center-wh">Check In

                </b-navbar-brand>

            </b-navbar>

        </div>
            
        <!-- Used vuetify for some cool travelling between 'pages' -->
        <v-app >

            <v-stepper class="bottom-padding" v-model="step" vertical v-if="survey.pages" > <!-- Scroll to top is working after clicking 'Previous' and 'Next' -->

                <!-- total pages with headers - used to step back and forth -->
                <!-- TODO: template based on total pages -->
                
                <v-stepper-items class="grey-background" >
                    
                    <v-stepper-content class="no-border no-margin no-padding" step="1">
                        
                        <!-- Introduction -->
                        <introduction-component :pageInfo=survey.pages[0] :introSurveyAnswers=surveyAnswers></introduction-component>
                    
                    </v-stepper-content>
                    
                    <v-stepper-content class="no-border no-margin no-padding" step="2">
                        
                        <!-- My Body -->
                        <myBody-component  :myBody=survey.pages[1] vbind:title="My Body" :surveyAnswers=surveyAnswers></myBody-component>

                    </v-stepper-content>
                    
                    <v-stepper-content class="no-border no-margin no-padding" step="3">
                        
                        <!-- My Mindset -->
                        <myMindset-component :myMindset=survey.pages[2] vbind:title="My Mindset" :surveyAnswers=surveyAnswers></myMindset-component>
                        
                    </v-stepper-content>
                    
                    <v-stepper-content class="no-border no-margin no-padding" step="4">
                    
                        <!-- My Skiing -->
                        <mySkiing-component :mySkiing=survey.pages[3] vbind:title="My Skiing" :surveyAnswers=surveyAnswers></mySkiing-component>

                    </v-stepper-content>
                    
                    <v-stepper-content class="no-border no-margin no-padding" step="5">
                    
                        <!-- My Goals -->
                        <goals-component :myGoals=survey.pages[4] vbind:title="Goals" :surveyAnswers=surveyAnswers></goals-component>
                    
                    </v-stepper-content>
                
                </v-stepper-items>
                        
                
            </v-stepper>

            

                    
        </v-app>

        <div class="navbar-test">
                            
                   

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <v-btn small id="previous" class="text--white" color="#E6E8EA" v-if="step >= 1" @click.native="step-- ; navigationHandler($event)">Previous</v-btn>

                            </div>
                            <div class="col">
                                <v-progress-linear v-model="progressBarPercentage"></v-progress-linear>

                            </div>
                            <div class="col">
                                <v-btn small id="next" class="text-white" color="#6DCDEA" @click.native="step++; navigationHandler($event)">Next</v-btn>

                            </div>
                        </div>
                    </div> 
                
                </div>
           
    </div>   

</template>

<script>

    //import the introduction component...realized I don't need to do this since it's done in the app.js
   import IntroductionComponent from './IntroductionComponent.vue'

    //This vue will simply hold the main common features of the 
    //survey i.e. => progres bar, next/prev buttons and the main header.
    

    export default {

        props: {
            surveyIn: {
                type: Object
            }
        },

        data: ()=>({

                surveyJson: null,
                
                //this is the survey answers object that is passed around
                surveyAnswers: {

                    pages : {

                        introduction: {
                            
                            answers : {}
                            
                        },

                        myBody: {

                            answers: {}
                                
                            
                        },

                        myMindset: {

                            answers: {}
                        },

                        mySkiing: {

                            answers: {}
                        },

                        goals: {

                            answers: {}
                        }
                    }
                },
   
                survey: {

                    pages: null,
                },

                progressBarPercentage: 0,
                step: 1
                
            }),

            methods: {

                    getSurveyObject() {
                        
                        axios.get('/SendCheckInInfo').then((response) => {
                            
                            this.surveyJson = response.data.survey;
                            this.survey.pages = this.surveyIn.pages;
                               
                            console.log(response.data);
                            console.log(this.surveyJson);
                        })

                        .catch(function (error) {
                            console.log(error);
                        });
                    },

                    testFunction() {

                        axios.get('/SanityCheck').then(function(response) {
                            console.log(response.data);
                        })
                        
                        .catch(function (error) {
                            console.log(error);
                        });

                        console.log("Test function worked bro!");
                    },

                    
                    
                    //Progress bar handler for navigation
                    navigationHandler: function(buttonSource){

                        var targetID = buttonSource.currentTarget.id;
                                                
                        if (targetID == "next" && this.step >= 1)
                        {
                            if (this.step == 2)
                            {
                                
                            }
                            this.progressBarPercentage += 20;
                        }
                        else
                        {
                            this.progressBarPercentage -= 20;
                        }
                        
                    },


                    
            },

        mounted() {
            this.survey.pages = this.surveyIn.pages;
            console.log('Component mounted.');
            console.log(this.survey.pages);
            //this.getSurveyObject();
            //this.testFunction();
        }
    }

</script>