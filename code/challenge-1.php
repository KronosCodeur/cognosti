<?php
function mergeAndSort($list)
{
    $bigList = [];
    foreach ($list as $item) {
        foreach ($item as $element) {
            $bigList[] = $element;
        }
    }
    $bigListLength = 0;
    foreach ($bigList as $bigListItem) {
        $bigListLength++;
    }
    for ($index = 0; $index < $bigListLength - 1; $index++) {
        for ($j = $index + 1; $j < $bigListLength; $j++) {
            if ($bigList[$index] > $bigList[$j]) {
                $temp = $bigList[$index];
                $bigList[$index] = $bigList[$j];
                $bigList[$j] = $temp;
            }
        }
    }
    return $bigList;
}

function getSubLists($bigList, $n)
{
    $bigListLength = 0;
    foreach ($bigList as $bigListItem) {
        $bigListLength++;
    }
    $subListLength = ($bigListLength - ($bigListLength % $n)) / $n;
    $subLists = [];
    for ($index = 0; $index < $n; $index++) {
        $subLists[] = makeSublist($bigList, $index * $subListLength, $subListLength);
    }
    $others = [];
    $othersLength = $bigListLength - $subListLength * $n;
    $start = $bigListLength - $othersLength;
    for ($secondIndex = $start; $secondIndex < $bigListLength; $secondIndex++) {
        $others[] = $bigList[$secondIndex];
    }
    return array($subLists, $others);
}

function makeSublist($list, $start, $length)
{
    $subList = [];
    for ($index = $start; $index < $start + $length; $index++) {
        $subList[] = $list[$index];
    }
    return $subList;
}

$firstList = [5, 8,9];
$secondList = [1, 7, 5, 4, 4, 8];
$lists = [$firstList,$secondList];
$res = getSubLists(mergeAndSort($lists), 2);
echo "\n Sublists => [";
foreach ($res[0] as $re) {
    echo '[';
    foreach ($re as $value) {
        echo $value . "-";
    }
    echo "]";
}
echo "]";
echo "\n Others => [";
foreach ($res[1] as $re) {

    echo $re . "-";
}
echo "]\n";

