<template>
    
    <div class="grey-background">
        
        

        <div class="container">
            <h3 class="center-text heading-3-montserrat-left-blac">{{title}}</h3>
            <div class="card h-100">
                <div class="container" v-if="questions[0]">
                    <div class="row">
                        <div class="col">
                            <div class="card-questions" v-if="questions[0]">
                                {{questions[0].question}}
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col text-center">
                            <div class="button-group-vertical" role="group">

                                <div v-for="n in 2" :key=n>
                                    <button type="button" class="btn body-link-bold-center shadow no-padding" id="personalQuestion" v-bind:class="{'select-box': choiceSelect[1][n] == true}" v-on:click="handleButton($event, n, 1)">{{questions[0].scale[2 - n]}}</button>                                            


                                </div>
                            </div>
                            

                        </div>

                    </div>
                    <div class="row" v-if="this.personalQuestionTrigger == true">
                        <v-text-field box :label="questions[1].question" v-model="surveyAnswers.pages.myMindset.answers['What did you want to tell coach?']"></v-text-field>
                            
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="container" v-if="questions[0]">
                    <div class="row">
                        <div class="col">
                            <div class="card-questions" v-if="questions[2]">
                
                                
                                {{questions[2].question}}
                                    
                            
                            </div>
                        </div>

                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-bullseye</v-icon>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <div class="button-group-vertical" role="group">

                                <div v-for="n in 5" :key=n>
                                    <button role="group" class="btn body-link-bold-center shadow no-padding" id="focusQuestion" block v-bind:class="{'select-box': choiceSelect[3][n] == true}"  v-on:click="handleButton($event, n, 3)">{{questions[2].scale[6 - n]}}</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-bullseye</v-icon>
                    </div>

                </div>

            </div>
            <div class="card">
                <div class="container" v-if="questions[0]">
                    
                    <div class="row">
                        <div class="col">
                            <div class="card-questions" v-if="questions[3]">
                        
                               
                                {{questions[3].question}}
                                
                                                                        
                            </div>
                        </div>

                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-plane-departure</v-icon>
                    </div>
                    <div class="row">
                        <div class="col center-text">
                            <div class="button-group-vertical" role="group">

                                <div  v-for="n in 5" :key=n>

                                    <button role="group" class="btn body-link-bold-center shadow no-padding" id="confidentQuestion" block v-bind:class="{'select-box': choiceSelect[4][n] == true}"  v-on:click="handleButton($event, n, 4)">{{questions[3].scale[6 - n]}}</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-plane-arrival</v-icon>
                    </div>

                </div>

            </div>
            <div class="card" >
                <div class="container">
                    <div class="row center-text" >
                        <div class="col">
                            <div class="card-questions" v-if="questions[4]">
                        
                                    
                                {{questions[4].question}}
                                      
                            
                            </div>
                        </div>

                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-rocket</v-icon>
                    </div>
                    <div class="row" v-if="questions[0]">
                        <div class="col text-center">
                            
                            <div class="button-group-vertical" role="group">

                                <div v-for="n in 5" :key=n >
                                    <button role="group" class="btn body-link-bold-center shadow no-padding" id="excitementQuestion" block v-bind:class="{'select-box': choiceSelect[5][n] == true}"  v-on:click="handleButton($event, n, 5)">{{questions[4].scale[6 - n]}}</button>                                            

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-center">
                        <v-icon>fa-grimace</v-icon>
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
        personalQuestionTrigger: null,
        choiceSelect: [[]],
        totalQuestions: null
    }),

    mounted() {

        this.questions = this.myMindset.questions;
        console.log(this.questions);

        var questionNumber = 1;
 
        this.questions.forEach(element => {
            
            this.choiceSelect[questionNumber] = [];

            questionNumber++;
        });
    },

    props: {
        myMindset : {},
        surveyAnswers: {},
        title: {

            type: String,
            default: 'My Mindset'
        }      
    },

    methods: {

        handleButton: function(buttonSource, buttonSelection, questionNumber){

            var targetID = buttonSource.currentTarget.id;
            var targetContent = buttonSource.currentTarget.textContent;
            
            if (targetID == "personalQuestion")
            {
                if (targetContent == "Yes")
                {
                    this.personalQuestionTrigger = true;        
                }

                this.surveyAnswers.pages.myMindset.answers['Anything to tell coach?'] = targetContent;

            }
            else if (targetID == "focusQuestion")
            {
                this.surveyAnswers.pages.myMindset.answers['Hows my focus'] = targetContent;
            }
            else if (targetID == "confidentQuestion")
            {
                this.surveyAnswers.pages.myMindset.answers['My confidence'] = targetContent;
            }
            else if (targetID == "excitementQuestion")
            {
                this.surveyAnswers.pages.myMindset.answers['My excitement'] = targetContent;
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

            console.log("Selected Option (Mindset): " + this.choiceSelect[questionNumber][buttonSelection]);
            console.log("ChoiceSelect (Mindset): " + this.choiceSelect[questionNumber]);
            
        }
        
    }    
}

</script>