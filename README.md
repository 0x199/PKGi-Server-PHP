# PKGi-Server-PHP
Useful class to make your own PKGi server without a database.

See packages.php for an example.

### How To Use
Use [theorywrongs generate_refs.php script](https://github.com/theorywrong/PKGi/blob/master/PKGi-Server/generate_refs.php) to generate a json file for your homebrew. You then assign the homebrew a ID of your own (in the example below we've assigned ID 1), and put these files in the directories as follows:

```
pkgs/1.pkg
refs/1.json
icons/1.png
```

Then, in packages.php, you can add the following:

```
$PKGi->addHomebrew('My Homebrew', 1);
```

It will then be added to the repo.

Credit to theorywrong for [PKGi](https://github.com/theorywrong/PKGi).
