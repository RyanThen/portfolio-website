'use strict';

// Overlay Message
const overlayMsg = document.querySelector('.overlay--msg');
const containerClose = document.querySelector('.container--close');

containerClose.addEventListener('click', function(){
  overlayMsg.classList.add('fade-away');
  setTimeout(function(){
    overlayMsg.style.display = 'none';
  }, 350)
});

// App
const score0El = document.querySelector('#score--0');
const score1El = document.querySelector('#score--1');
const currentScore0El = document.querySelector('#current--0');
const currentScore1El = document.querySelector('#current--1');
const diceImage = document.querySelector('.dice');
const rollButton = document.querySelector('.btn--roll');
const holdButton = document.querySelector('.btn--hold');
const newButton = document.querySelector('.btn--new');

let fullScores, currentScore, activePlayer, gameInProgress;

const player0 = document.querySelector('.player--0');
const player1 = document.querySelector('.player--1');

const init = function () {
  fullScores = [0, 0];
  currentScore = 0;
  activePlayer = 0;
  gameInProgress = true;

  score0El.textContent = 0;
  score1El.textContent = 0;
  currentScore0El.textContent = 0;
  currentScore1El.textContent = 0;

  diceImage.classList.add('hidden');
  player0.classList.remove('player--winner');
  player1.classList.remove('player--winner');
  player0.classList.add('player--active');
  player1.classList.remove('player--active');
};

init();

const switchPlayer = function () {
  document.querySelector(`#current--${activePlayer}`).textContent = 0;
  currentScore = 0;
  player0.classList.toggle('player--active');
  player1.classList.toggle('player--active');
  activePlayer = activePlayer === 0 ? 1 : 0;
};

rollButton.addEventListener('click', function () {
  if (gameInProgress) {
    let randomDiceRoll = Math.trunc(Math.random() * 6) + 1;

    diceImage.src = `dice-${randomDiceRoll}.png`;

    if (diceImage.classList.contains('hidden')) {
      diceImage.classList.remove('hidden');
    }

    if (player0)
      if (randomDiceRoll !== 1) {
        currentScore += randomDiceRoll;
        document.querySelector(
          `#current--${activePlayer}`
        ).textContent = currentScore;
      } else {
        switchPlayer();
      }
  }
});

holdButton.addEventListener('click', function () {
  if (gameInProgress) {
    fullScores[activePlayer] += currentScore;

    document.querySelector(`#score--${activePlayer}`).textContent =
      fullScores[activePlayer];

    if (fullScores[activePlayer] >= 100) {
      gameInProgress = false;
      diceImage.classList.add('hidden');

      document
        .querySelector(`.player--${activePlayer}`)
        .classList.add('player--winner');
      document
        .querySelector(`.player--${activePlayer}`)
        .classList.remove('player--active');
    } else {
      switchPlayer();
    }
  }
});

newButton.addEventListener('click', init);
