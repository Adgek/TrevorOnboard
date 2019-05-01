# TrevorOnboard

Hey Trevor here's your first task for Coachable while I'm away in Spain. If you have any questions, or the task is unclear hit me up on slack i'll try my best to answer. 

# The Task!

-   Take data from the survey controller method and create the vue.js files to simulate an athlete survey experience. 
-   Send back a completed survey object to the server.
-   Files I see being deliverables
    -   Multiple Vue.js files
    -   Sass file with needed CSS
    -   
	
# The Reqs
-   Front end must be fully functional from design mock ups.
-   Logic for progress bar must be implemented
-   All data needed should be passed to Vue from controller (let me know if you need some data, I might have missed something)
-   Followup questions are not displayed until their parent question has the trigger response (they are displayed under the parent question as a open question.)
-   All questions must be filled in before moving on to next page or finishing survey (be careful to excluded not triggered followup questions here.)
-   Must be able to go back to previous pages and forward agian with saving state of answers.
 
-   Logical design classes based from Himesh's style guide and mockups
    -   Many of the design classes should be able to be used in other places so keep that in mind.
-	Don't worry about the icon pictures themselves, but make sure that they are different based on the name given.   

# Things to look out for.
-   Having a vue template inside a vue template is a great idea here to display the pages while keeping the answers stored on the parent template. It's tricky stuff but would be how I would approach the issue of variable number of pages.
-   Make sure you know the scope of where you are storing your answers, vue props will be your friends here.
-   Make sure your design accounts for a variable amount of pages and questions because we don't know what questions will be on each page, or how many pages there will be.
-	Keep modular design in mind, for example. the reason the order variable is on the pages is that if we add a new page to the survey we dont want to depend on ID order for order (the same should be said for questions on each page...... left this undone on purpose to see if you read the doc ahah i'm sneaky let me know if you see this easter egg.)
-   You'll need to compile these files, look at the webpack.mix.js file for help on this.
-	Notice that trigger answer can either be a number, or an array of numbers depending on the question. Plan accordingly
-	Don't be scared to look at libraries for some of the functionality (progress bar)

