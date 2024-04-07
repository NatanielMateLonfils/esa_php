<?php
    function displayChessboard() {
        $blackPieces = ['blackRook.png', 'blackKnight.png', 'blackBishop.png', 'blackQueen.png', 'blackKing.png', 'blackBishop.png', 'blackKnight.png', 'blackRook.png', 'blackPawn.png'];
        $whitePieces = ['whiteRook.png', 'whiteKnight.png', 'whiteBishop.png', 'whiteQueen.png', 'whiteKing.png', 'whiteBishop.png', 'whiteKnight.png', 'whiteRook.png', 'whitePawn.png'];

        for ($row=0; $row<=7; $row++) {
            for ($column=0; $column<=7; $column++) {

                // Determine the right piece to display
                if ($row == 0) {
                    $blackPiece = $blackPieces[$column];
                    $whiteSquare = '<div id="whiteSquare"><img src="images/' . $blackPiece . '"></div>';
                    $blackSquare = '<div id="blackSquare"><img src="images/' . $blackPiece . '"></div>';
                }
                elseif ($row == 1) {
                    $blackPiece = $blackPieces[8];
                    $whiteSquare = '<div id="whiteSquare"><img src="images/' . $blackPiece . '"></div>';
                    $blackSquare = '<div id="blackSquare"><img src="images/' . $blackPiece . '"></div>';
                }
                elseif ($row == 6) {
                    $whitePiece = $whitePieces[8];
                    $whiteSquare = '<div id="whiteSquare"><img src="images/' . $whitePiece . '"></div>';
                    $blackSquare = '<div id="blackSquare"><img src="images/' . $whitePiece . '"></div>';
                }
                elseif ($row == 7) {
                    $whitePiece = $whitePieces[$column];
                    $whiteSquare = '<div id="whiteSquare"><img src="images/' . $whitePiece . '"></div>';
                    $blackSquare = '<div id="blackSquare"><img src="images/' . $whitePiece . '"></div>';
                }
                else {
                    $whiteSquare = '<div id="whiteSquare"></div>';
                    $blackSquare = '<div id="blackSquare"></div>';
                }

                // Display the relevant square
                if (($row + $column) % 2 == 0) {
                    echo $whiteSquare;
                }
                else {
                    echo $blackSquare;
                }
            }
        }
    }
?>