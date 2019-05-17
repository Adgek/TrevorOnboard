<!-- This component will house the 'plan' segment
     of the introduction
-->

<template>
    
    <div class="grey-background">
       
        <h3>{{title}}</h3>
 
        <div class="container">
            
            <div class="card">
                <div class="container">
                    <div class="row">
                        
                        <div class="col">
                            
                            <div class="headline">
                                *Icon* {{discipline}}
                            </div>
                                
                        </div>
                
                        <div class="col">
                            <div class="headline">
                                {{location}}
                            </div>
                        </div>

                        <div class="col">
                            <div class="headline">
                                {{parsedDate}}
                            </div>
                        </div>
        
                    
                    </div>
                    
                    <div class=row>
                        
                        <div class="col">
                        
                            Focus
                
                        </div>
                        
                    </div>

                    <div class="row">

                        <div v-for="focus in focuses" :key="focus">
                
                            <div class="col">
                
                                <v-btn disabled>{{focus}}</v-btn>

                            </div>

                        </div>
                        
                    </div>

                    <div class="row">
                            
                        <div class="col">
                            Coach's Plan
                        </div>
                        
                    </div>

                    <div class="row">
                        
                        <div class="col">

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

        this.parseDate(this.date);
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