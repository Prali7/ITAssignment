<?php
$tags = ["PHP", "Web Development", "Programming", "MySQL", "Backend"];
echo "Tags as array: ";
print_r($tags);
echo "<br><br>";
$tagString = implode(", ", $tags);
echo "Tags as string: $tagString<br><br>";
$newTags = explode(", ", $tagString);
if (in_array("PHP", $newTags)) {
    echo "\"PHP\" tag exists<br>";
} else {
    echo "\"PHP\" tag not found<br>";
}
if (in_array("JavaScript", $newTags)) {
    echo "\"JavaScript\" tag exists<br>";
} else {
    echo "\"JavaScript\" tag not found<br>";
}
sort($newTags);
echo "<br>Sorted tags: " . implode(", ", $newTags) . "<br>";
echo "Total tags: " . count($newTags);
?>