# Plugin

This plugin defines:

- **CPT Dogs**: you can select it on the menu and create new custom post `Dogs`.
- Block **Dog Meta in Single Dog**
- Block **Dog Meta Optional in Single Dog**

At the moment the blocks don't have almost attributes, it's mostly empty.  
But it works. We have set up `webpack.config.js` so there are 2 entry points, one for every block.

Blocks are defined without **block.json**, because it is not possible to bundle both blocks with this setup.

# FILES TO SEE

## For the Plugin

Go directly to

- `core/includes/classes/class-...-run.php`

## For the block

- `core/includes/assets/`
- There the block filesysytem was created with @wordpress/create-block, setting up the wp-scripts for it
- From that folder, run `npm run start`
