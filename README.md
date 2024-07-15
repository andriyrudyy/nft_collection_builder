![image](https://github.com/user-attachments/assets/c447fc5f-e8d1-436e-9533-a8c30d3f0736)

<p>
We have developed a website template for NFT collections, which includes a profile builder and wallet checker. You can take this template and customize it to fit your needs, or you can contact me via private message to add additional functionality.<br><br>

Traits should be stored in the directory **/public/traits/**.<br><br>

Wallet lists are located in the directory **/storage/app/wallets/** in the files fcfs.txt and gtd.txt. Each wallet address starts on a new line.<br><br>

The website is developed using Laravel. In the configuration file .env, you need to set your parameters as follows:<br>
**APP_NAME**="NFT Collection Builder" - collection name<br>
**WL_CHECKER_ENABLED**=false - display wallet verification and menu or not<br>
**TRAIT_FOLDERS**="Eyes,Mouth,Body,Legs,Hands,Head,Ears,Background" - sequence of traits as they should be overlaid on each other<br>
**TWITTER_URL**="https://x.com/" - link to the project's Twitter<br>
**DISCORD_URL**="https://discord.com/" - link to the project's Discord<br>
</p>

