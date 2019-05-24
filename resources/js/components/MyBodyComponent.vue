<template>
    
    <div class="grey-background">
    
        
       
        <div class="container">
            <h3 class="center-text heading-3-montserrat-left-blac">{{title}}</h3>
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card-questions" v-if="questions[0]">
                                
                                {{questions[0].question}}
                                    
                            </div>
                        </div>
                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-battery-full</v-icon>
                    </div>

                    <div class="row" v-if="questions[0]">
                        <div class="col text-center">

                        
                            <div class="button-group-vertical" role="group" key="set1">
                                <div v-for="n in 5" :key=n >
                                
                                <!-- TODO: dynamically get total number of scale choices -->
                                    <button type="button" class="btn body-link-bold-center shadow no-padding" v-bind:class="{'select-box': choiceSelect[1][n] == true}" id="energyLevelQuestion" v-on:click="handleButton($event, n, 1)">{{questions[0].scale[6 - n]}}</button>                                           
                                
                                </div>
                            </div>
                        </div> 
                        
                        
                    </div>
                    
                    <div class="row text-center">
                        <div class="col" v-if="this.energyQuestionTrigger == true">
                                    
                            <v-text-field box :label="questions[1].question" v-model="surveyAnswers.pages.myBody.answers['Why is energy low?']"></v-text-field>
                        
                        </div>
                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-battery-empty</v-icon>
                    </div>

                    <div class="row">
                        <div class="col">

                        </div>
                    </div>
                </div>
            </div>

            <div class="card top-padding">
                <div class="container">
                    <div class="row" v-if="questions[0]">
                        <div class="col">
                            <div class="card-questions">
                                {{questions[2].question}}

                            </div>
                        </div>
                    </div>

                    <div class="row" v-if="questions[2]">
                        <div class="col text-center">
                            <div class="button-group-vertical" role="group" key="set2">

                                <div v-for="n in 2" :key=n >
                                    <!-- TODO: dynamically get total number of scale choices -->
                                    <button type="button" role="group" class="btn body-link-bold-center shadow no-padding" v-bind:class="{'select-box': choiceSelect[3][n] == true}" id="eatDrinkQuestion" v-on:click="handleButton($event, n, 3)">{{questions[2].scale[2 - n]}}</button>                                           
                                                                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row" v-if="this.eatDrinkQuestionTrigger == true">
                                
                        <v-text-field outline :label="questions[3].question" v-model="surveyAnswers.pages.myBody.answers['Why didnt I eat right?']"></v-text-field>
                    
                    </div>
                </div>
            </div>
        </div>
                
                    
                               
    </div>

</template>

<script>

export default {

    data: ()=> ({

        questions: {}, //question object for my body page
        energyQuestionTrigger: false,
        eatDrinkQuestionTrigger: false,
        isActive: false,
        choiceSelect:[[]],

        totalQuestions: null,
            
    
    }),

    mounted() {

        this.questions = this.myBody.questions;

        //get total questions for page
        this.totalQuestions = Object.keys(this.questions).length;
        console.log(this.questions);
        console.log('QUESTION COUNT: ' + this.totalQuestions);

        var questionNumber = 1;
 
        this.questions.forEach(element => {
            
            this.choiceSelect[questionNumber] = [];

            questionNumber++;
        });
       
       
       
        
    },

    props: {

        myBody : {},
        surveyAnswers: {},
        title: {

            type: String,
            default: 'My Body'
        }       
    },

    methods: {

        handleButton: function (buttonSource, buttonSelection, questionNumber) {

            var targetID = buttonSource.currentTarget.id;
            var targetContent = buttonSource.currentTarget.textContent;

            console.log("Buton Selection: " + buttonSelection);
            console.log("Question Number: " + questionNumber);

            if (targetID == "energyLevelQuestion") {
                if (targetContent == "Bad" || targetContent == "Terrible") {
                    this.energyQuestionTrigger = true;
                    console.log(targetContent);
                }
                else {
                    //reset values since text box is no longer valid
                    this.energyQuestionTrigger = false;
                    this.surveyAnswers.pages.myBody.answers['Why is energy low?'] = null;
                }

                this.surveyAnswers.pages.myBody.answers['How is my energy level?'] = targetContent;

            }
            else if (targetID == "eatDrinkQuestion") {
                if (targetContent == "No") {
                    this.eatDrinkQuestionTrigger = true;
                }
                else {
                    //reset values since text box is no longer valid
                    this.eatDrinkQuestionTrigger = false;
                    this.surveyAnswers.pages.myBody.answers['Why didnt I eat right?'] = null;
                }

                this.surveyAnswers.pages.myBody.answers['Did I eat and drink right?'] = targetContent;
            }

            this.choiceSelect[questionNumber].fill(false); //reset all values to false (for this question)

            //instantiate selection array (if needed -> going to move in mounted)
            if (this.choiceSelect[questionNumber] == null) {
                this.choiceSelect[questionNumber] = [];
            }

            //set if false to true and if true to false (opposite of previous value)
            if (this.choiceSelect[questionNumber][buttonSelection] == true) {
                this.choiceSelect[questionNumber][buttonSelection] = false;
            }
            else {
                this.choiceSelect[questionNumber][buttonSelection] = true;
            }

            this.$forceUpdate();
            console.log("Selected Option: " + this.choiceSelect[questionNumber][buttonSelection]);

        }
        
    }
}
 

</script>