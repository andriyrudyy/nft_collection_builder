<img width="925" alt="Screenshot 2024-07-15 at 16 34 33" src="https://github.com/user-attachments/assets/b89f0d7e-aee5-47f1-a776-2cdd3820d6fe">

<img width="925" alt="Screenshot 2024-07-15 at 16 34 26" src="https://github.com/user-attachments/assets/f029c425-f7de-4aea-a850-aa9ff4646951">

<p>
We have developed a website template for NFT collections, which includes a profile builder and wallet checker. You can take this template and customize it to fit your needs, or you can contact me via private message to add additional functionality.<br><br>

Traits should be stored in the directory **/public/traits/**.<br><br>

Wallet lists are located in the directory **/storage/app/wallets/** in the files fcfs.txt and gtd.txt. Each wallet address starts on a new line.<br><br>

The website is developed using Laravel. In the configuration file .env, you need to set your parameters as follows:<br>
**APP_NAME**="NFT Builder" - collection name<br>
**WL_CHECKER_ENABLED**=false - display wallet verification and menu or not<br>
**TRAIT_FOLDERS**="Eyes,Mouth,Body,Legs,Hands,Head,Ears,Background" - sequence of traits as they should be overlaid on each other<br>
**TWITTER_URL**="https://x.com/" - link to the project's Twitter<br>
**DISCORD_URL**="https://discord.com/" - link to the project's Discord<br>
</p>

