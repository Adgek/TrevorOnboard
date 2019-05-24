<!-- This component will house the 'plan' segment
     of the introduction
-->

<template>
    
    <div class="grey-background">
       
        
 
        <div class="container">
            <h3 class="heading-3-montserrat-left-blac">{{title}}</h3>
            
            <div class="card h-100">
                <div class="container">
                    <div class="row">
                        
                        

                        <div class="col-3">
                            <div class="heading-4-montserrat-center-black-left">
                            
                                <v-icon>fa-stopwatch</v-icon>{{discipline}}
                                
                            </div>

                        </div>
                
                        <div class="col-5">
                            <div class="heading-3-bold-montserrat-cent ">
                                {{location}}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="heading-4-black-right-date">
                                {{date}}
                            </div>
                        </div>
        
                    
                    </div>
                    
                    <div class=row>
                        
                        <div class="col top-padding-sml heading-4-montserrat-center-black-left">
                        
                            Focus
                
                        </div>
                        
                    </div>

                    <div class="row">

                        <div v-for="focus in focuses" :key="focus">
                
                            <div class="col">
                
                                <v-btn small disabled>{{focus}}</v-btn>

                            </div>

                        </div>
                        
                    </div>

                    <div class="row">
                            
                        <div class="col top-padding-sml heading-4-montserrat-center-black-left">
                            Coach's Plan
                        </div>
                        
                    </div>

                    <div class="row">
                        
                        <div class="col paragraph">

                            {{notes}}
                
                        </div>
                
                    </div>
                </div>
                
            
            </div>
    
        </div>
    </div>    
        
                    
        
       

</template>

<script>

export default {

    props: {

        title: {

            type: String,
            default: 'The Plan'
        },

        location: {

            type: String,
            default: 'Chicopee'
        },

        focuses: {

            type: [Object, Array]

        },

        discipline: {
            type: String,
            default: 'SL'
        },

        date: {

            type: String,
        },

        notes: {

            type: String,
            default: "No notes"
        }
        
    },

    data: ()=> ({

        parsedDate: null
    }),

    mounted() {

        //this.parseDate(this.date);
        console.log('After');
        
        console.log(this.focuses);
        console.log('After');
        
    },

    methods: {

        parseDate: function(nonParsedDate) {

            this.parsedDate = nonParsedDate.slice(0, 10);
        },

        

    }

}

</script>