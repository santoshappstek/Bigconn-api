<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert(array(        

        array('title' => 'DIVERSITY, EQUITY, AND INCLUSION','description' =>'Big Brothers Big Sisters of Central Indiana actively engages diversity, inclusion and cultural competencies throughout our organization. BBBSCI serves an incredibly diverse constituency of adult volunteers, youth and families of the youth, donors, and partners.  It is paramount to achieving our mission to value diversity and practice inclusion amongst all of our stakeholders served by the organization.  In doing so, we recognize the strengths and challenges of diversity include but are not limited to –race, religion, national origin, color, economic status, gender identity or expression, sexual orientation, marital status, disability education, expertise, and socio-economic status.  The organization’s staff and board strive to be representative of the constituencies we serve.','files' =>'https://bigsconnect.com/api/resources/diversity.jpg','active_status'=>'0'),

        array('title' => 'HOW TO KEEP YOUR LITTLE ENGAGED DURING COVID-19', 'description' => 'In the past week we hosted two Virtual Big Get Togethers. These events allowed Bigs to come together and share their best successes in connecting with their Littles during this time of social distancing, as well as their biggest struggles. This resource summarizes some of the best tips & tricks that we learned from Bigs that you can take and try with your own Little if you have been struggling to connect. If you have more ideas that you think would be helpful for your fellow Bigs','files'=>'https://bigsconnect.com/api/resources/parentkid.png','active_status'=>'0'),

        array('title' => 'Global operation sees a rise in fake medical products related to COVID-19','description' =>'The outbreak of the coronavirus disease has offered an opportunity for fast cash, as criminals take advantage of the high market demand for personal protection and hygiene products.Law enforcement agencies taking part in Operation Pangea found 2,000 online links advertising items related to COVID-19. Of these, counterfeit surgical masks were the medical device most commonly sold online, accounting for around 600 cases during the week of action.The seizure of more than 34,000 counterfeit and substandard masks, “corona spray”, “coronavirus packages” or “coronavirus medicine” reveals only the tip of the iceberg regarding this new trend in counterfeiting.','files' =>'https://bigsconnect.com/api/resources/resources.png','active_status'=>'0'),

        array('title' =>'WATCH, DO, READ, & LISTEN!', 'description'=>'In honor of celebrating and recognizing Black History Month, BBBSCI has put together a list of various ways for you to engage in personal racial equity & justice work. We believe that this racial equity and social justice work is more important than ever as our country finds itself in a divisive and contentious position. Throughout Black History Month, we will continue posting community events, as well as our own events focusing on social justice & BHM. Please reach out to activities@bbbsci.org if you have information or resources to share regarding Black History Month!','files'=>'https://bigsconnect.com/api/resources/resources.png','active_status'=>'0'),

        array('title' =>'WHO and public health experts conclude COVID-19 mission to Islamic Republic of Iran', 'description'=>'12 March 2020 - A team of experts from the World Health Organization(WHO), GOARN partners, Robert Koch Institute in Berlin and the Chinese Center for Disease Control concluded a technical support mission on COVID-19 to Islamic Republic of Iran on 10 March 2020.','files' => 'https://bigsconnect.com/api/resources/video.png','active_status'=>'0'),

        array('title' => 'The Play at Home Playbook', 'description'=> 'At Playworks, we believe every child should experience safe and healthy play everyday. Playworks’ evidence-based programs have been proven to get kids moving, while teaching them social-emotional skills like cooperation and conflict resolution. Now more than ever, these skills are essential to helping kids across the country combat stress and anxiety and successfully navigate the uncertainty and change associated with the COVID-19 crisis.
        	The games in this guide can be played anywhere, but we have assembled them for kids who may be playing at home due to school closures. In these settings, the challenge is not just to introduce games kids will love, but also to ensure that children can play in the space safely and in accordance with all CDC guidelines to help prevent the spread of coronavirus. 
        	Making playtime run smoothly often starts with game rules, while still keeping it fun. In
			the following pages, you will find the rules of games that require little to no quipment,can be played with one child or siblings, and can be led by families, teachers, caring adults, and peers.
			For more than 24 years, Playworks has helped schools and youth organizations through
			on-site staffing, consultative support, staff training, and most recently, online learning.
			We are a mission-driven nonprofit committed to the power of play.', 'files'=>'https://bigsconnect.com/api/resources/playathome.png','active_status'=>'0'),		
        ));
    }
}
