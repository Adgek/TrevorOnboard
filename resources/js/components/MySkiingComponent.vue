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
                    <div class="row" v-if="questions[0]">
                        <div class="col text-center">
                            <div class="button-group-vertical" role="group">

                                <div v-for="n in 2" :key=n>
                                    <!-- TODO: dynamically get total number of scale choices -->
                                    <button role="group"  class="btn body-link-bold-center shadow no-padding" id="equipmentQuestion"  v-bind:class="{'select-box': choiceSelect[1][n] == true}" v-on:click="handleButton($event, n, 1)">{{questions[0].scale[2 - n]}}</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col" v-if="this.equipmentQuestionTrigger == true">
                            <v-text-field box :label="questions[1].question" v-model="surveyAnswers.pages.mySkiing.answers['Why is your equipment not ready?']"></v-text-field>

                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card-questions" v-if="questions[2]">
                                {{questions[2].question}}
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col" v-if="questions[2]">
                            <v-text-field box :label="questions[2].question" v-model="surveyAnswers.pages.mySkiing.answers['Todays focus?']"></v-text-field>


                        </div>
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
        equipmentQuestionTrigger: false,
        choiceSelect: [[]]
    }),

    mounted() {

        this.questions = this.mySkiing.questions;
        console.log(this.questions);

        var questionNumber = 1;
 
        this.questions.forEach(element => {
            
            this.choiceSelect[questionNumber] = [];

            questionNumber++;
        });
    },

    props: {

        mySkiing : {},
        surveyAnswers: {},
        title: {

            type: String,
            default: 'My Skiing'
        }

        
    },

    methods: {

        handleButton: function(buttonSource, questionNumber, buttonSelection){

            var targetID = buttonSource.currentTarget.id;
            var targetContent = buttonSource.currentTarget.textContent;
            
            if (targetID == "equipmentQuestion")
            {
                if (targetContent == "No")
                {
                    this.equipmentQuestionTrigger = true;        
                }

                this.surveyAnswers.pages.mySkiing.answers['Equipment Ready?'] = targetContent;

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

            console.log("Selected Option (Skiing): " + this.choiceSelect[questionNumber][buttonSelection]);
            console.log("ChoiceSelect (Skiing): " + this.choiceSelect[questionNumber]);
            
        }
        
    }    
}

</script>