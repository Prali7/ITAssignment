<?php
$comment = "This is a damn good product but the service is hell";
$badWords = ["damn", "hell"];
echo "Original: " . $comment . "<br>";
$censoredComment = $comment;
$censoredCount = 0;
foreach ($badWords as $word) {
    $count = substr_count(strtolower($censoredComment), strtolower($word));
    $censoredCount += $count;
    $censoredComment = str_ireplace($word, "****", $censoredComment);
}
echo "Censored: " . $censoredComment . "<br>";
echo "Words censored: " . $censoredCount;
?>
