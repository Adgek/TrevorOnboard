<!-- This is the main component for the survey. It will
     eventually house all of the vue components for buttons and pages etc. 
-->

<template>
    <!-- Main div for app -->
        <div id="app"  >

            <!-- Navbar at the top of screen TODO: centre it! -->       
            <div justify-center id="top">

                <b-navbar class="header bottom-pad" type="dark" variant="info" fixed="top">

                    <b-navbar-brand href="#">Check In</b-navbar-brand>

                </b-navbar>

            </div>

            <!-- Used vuetify for some cool travelling between 'pages' -->
            <v-app>
           
                <v-content>

                    <v-container class="top-padding">
                       
                        <br>

                        <v-stepper v-model="step" vertical > <!-- Scroll to top is working after clicking 'Previous' and 'Next' -->

                            <!-- total pages with headers - used to step back and forth -->
                            <!-- TODO: template based on total pages -->
                            <v-stepper-header  v-if="survey">

                                <v-stepper-step step="1" :complete="step > 1">
                                    
                                    {{survey.pages[0].name}} <!-- TODO: figure out a way to get page names better -->

                                </v-stepper-step>

                                <v-divider></v-divider>

                                <v-stepper-step step="2" :complete="step > 2">

                                    {{survey.pages[1].name}}

                                </v-stepper-step>

                                <v-divider></v-divider>

                                <v-stepper-step step="3" :complete="step > 3">

                                    {{survey.pages[2].name}}

                                </v-stepper-step>

                                <v-divider></v-divider> 
                                
                                <v-stepper-step step="4" :complete="step > 4">

                                    {{survey.pages[3].name}}

                                </v-stepper-step>

                                <v-divider></v-divider>

                                <v-stepper-step step="5" :complete="step > 5">

                                    {{survey.pages[4].name}}

                                </v-stepper-step>

                                <v-divider></v-divider>
                            </v-stepper-header>
                            <v-stepper-items  v-if="survey">
                                <v-stepper-content step="1">

                                    <introduction-component :pageInfo=survey.pages[0] :introSurveyAnswers=surveyAnswers></introduction-component>
                                </v-stepper-content>
                                <v-stepper-content step="2">
                                    <myBody-component  :myBody=survey.pages[1] vbind:title="My Body" :surveyAnswers=surveyAnswers></myBody-component>

                                </v-stepper-content>
                                <v-stepper-content step="3">
                                    <myMindset-component :myMindset=survey.pages[2] vbind:title="My Mindset" :surveyAnswers=surveyAnswers></myMindset-component>
                                    
                                </v-stepper-content>
                                <v-stepper-content step="4">
                                    <mySkiing-component :mySkiing=survey.pages[3] vbind:title="My Skiing" :surveyAnswers=surveyAnswers></mySkiing-component>

                                </v-stepper-content>
                                <v-stepper-content step="5">
                                    <goals-component :myGoals=survey.pages[4] vbind:title="Goals" :surveyAnswers=surveyAnswers></goals-component>
                                </v-stepper-content>
                            </v-stepper-items>
                            <!-- Introduction -->
                            

                             <v-container grid-list-md text-xs-center>
                                <v-layout row wrap>
                                
                                    <v-flex>
                                        <v-btn flat v-if="step > 1" @click.native="step-- ">Previous</v-btn>
                                        
                                    </v-flex>
                                    <v-flex>
                                        <!-- Basic progress bar. Just a placeholder, for now -->
                                        <v-progress-linear v-model="progressBarPercentage"></v-progress-linear>

                                    </v-flex>
                                    <v-flex>
                                        <v-btn  color="primary" @click.native="step++">Next</v-btn>

                                    </v-flex>
                                    
                                </v-layout>
                            </v-container> 

                        </v-stepper>
                        
                               
                        

                    </v-container>

                </v-content>
                
            </v-app>

            <br/><br/>

            <!-- Debugging survey object -->
        </div>   
</template>

<script>

    //import the introduction component
   import IntroductionComponent from './IntroductionComponent.vue'

    //This vue will simply hold the main common features of the 
    //survey i.e. => progres bar, next/prev buttons and the main header.

    export default {

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
                progressBarPercentage: 10,
                step: 1
                
            }),

            methods: {
                    getSurveyObject() {
                        
                        axios.get('/SendCheckInInfo').then((response) => {
                            this.surveyJson = response.data.survey;
                            this.survey.pages = this.surveyJson.pages;
                            //this.jsonObject = JSON.parse(response.data);
                            //this.survey = response.data;    
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
                    }
        },

        mounted() {
            console.log('Component mounted.');
            this.getSurveyObject();
            //this.testFunction();
        },
    }

</script>