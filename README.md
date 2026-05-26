# Siccor-Rock-Paper Game

A simple web-based implementation of the classic Rock-Paper-Scissors game with a twist - it's called "Siccor-Rock-Paper" in this implementation.

## Project Structure

```
srp/
├── index.php          # Main game file with PHP backend and HTML/JavaScript frontend
├── localinfo.php      # PHP info page (development utility)
├── README.md          # This file
├── js/
│   └── Jquery/
│       └── jquery-1.9.1.js  # jQuery library
├── S.png              # Scissors image
├── R.png              # Rock image
├── P.png              # Paper image
└── all.png            # Combined game elements image
```

## How to Play

1. **Setup**: Ensure you have a web server with PHP support (Apache, Nginx, etc.)
2. **Access**: Place the files in your web server's document root and navigate to `index.php`
3. **Gameplay**:
   - Click on one of the three options: Scissors (S), Rock (R), or Paper (P)
   - The computer will randomly select its choice
   - The winner is determined based on standard Rock-Paper-Scissors rules:
     - Scissors beats Paper
     - Rock beats Scissors  
     - Paper beats Rock
   - If both players choose the same option, it's a tie

## Game Rules

The game follows standard Rock-Paper-Scissors rules:
- **Scissors (S)** cuts **Paper (P)** → Scissors wins
- **Rock (R)** crushes **Scissors (S)** → Rock wins
- **Paper (P)** covers **Rock (R)** → Paper wins
- Same selections result in a tie ("No winner")

## Technical Details

### Backend (PHP)
- Located in `index.php` (lines 10-34)
- Handles POST requests with user selection
- Uses array-based logic to determine the winner
- Returns JSON response with:
  - `machine`: Computer's selection
  - `user`: User's selection  
  - `winner`: Result ("User", "Machine", or "No winner")

### Frontend
- HTML/CSS/JavaScript interface
- Uses jQuery 1.9.1 for AJAX requests and DOM manipulation
- Visual feedback:
  - Selected option highlights in red
  - Score tracking for both user and machine
  - Historical results display
  - Winner of each round is highlighted

### Game Flow

1. User clicks on an option (S, R, or P)
2. AJAX request sends selection to PHP backend
3. Backend determines computer's random choice
4. Winner is calculated based on game rules
5. Results are displayed:
   - Computer's choice appears as an image
   - Scores are updated
   - Round history is appended to the results list

## Development Notes

- The code is described as "spaghetti code" by the author and is intended for logic demonstration only
- Uses inline PHP, HTML, CSS, and JavaScript in a single file
- jQuery is used for DOM manipulation and AJAX requests
- Game state is maintained client-side

## Screenshots

The game includes visual elements:
- `S.png` - Scissors icon
- `R.png` - Rock icon
- `P.png` - Paper icon
- `all.png` - Combined game elements

## Running the Game

1. Start your web server
2. Navigate to the project directory
3. Open `index.php` in your browser
4. Click on the icons to play against the computer

## License

This is a demo project for educational purposes. No specific license is mentioned.

## Author's Note

> "This is demo code for the game Siccor-Rock-Paper
> Sorry, this is spaghetti code what I really hate.
> Written for logic demonstration only.
> Write me if you need OOP MVC developer."

The author acknowledges the code quality issues but emphasizes this is for demonstration of game logic only.