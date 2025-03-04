# RPG-APP



## Installation:

## Tools:
- To list all files that needs to be fixed: `vendor/bin/php-cs-fixer check`
    - To fix files according to configured rules: `vendor/bin/php-cs-fixer fix`
- PHPUnit:
    - To run the PHPUnit tests: `vendor/bin/phpunit`
- PHP Stan:
    - Run the tool: `vendor/bin/phpstan analyse --level=10 src tests --generate-baseline`
    - Note: we're using the MAX level of PHPStan. The baseline allow us to tackle the problems one by one. The goal is to never increase the number of errors identified.











## What are all of these Entities? TO-REWORK

#### *Something*Encyclopedia
These are the classes that list an example of a standard object. It may serve as a model to create some. Theses classes will be moved in their own API later.
Ex: A Goblin.

#### *Something*
These are the implementations of the Encyclopdia classes.
Ex: A Goblin lvl 2 and a Goblin lvl 5 for instance.

#### Character:
A character that may be played by a player.
Ex: Epolas Eret'Matkin

#### Item:
An item may be used by a player to do an action.
Ex: A rock, a potion, or a key

#### Mastery:
A mastery may be unlocked on a Mastery Tree.
Ex: Far-Sight

#### Monster:
A creature that may attack the player.
Ex: A Goblin

#### Non-Playable Character:
A character that can't be played by a player, is used by the Game Master, and can do some actions by itself.
Ex: Al'Ratab

#### Skill:
A skill is attached to a Weapon, an Item or a Character. It is used as an action.
Ex: Slicing Attack

#### Spell:
A spell may be cast by some Character, NonPlayableCharacter and Monsters. It costs mana and require a dedicated type of magic and level to unlock it.
Ex: Fireball

#### Talent:
A character have many talent that are used to act.
Ex: Archery

#### Weaponry:
A type of item, that may be used in battle to fight or protect.
Ex: A wooden sword or a wooden helmet
