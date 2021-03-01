<?php
// require_once('./classes/Lives.php');
// require_once('./classes/Enemy.php');
// require_once('./classes/Human.php');
// require_once('./classes/Brave.php');
// require_once('./classes/BlackMage.php');
// require_once('./classes/WhiteMage.php');
// require_once('./classes/Message.php');

require_once("./lib/Loader.php");
require_once("./lib/Utility.php");

$loader = new Loader;
$loader->regDirectory(__DIR__. '/classes');
$loader->regDirectory(__DIR__."/classes/constants");
$loader->register();

$members = array();
$members[] = Brave::getInstance(CharacterName::TIIDA); 
$members[] = new WhiteMage(CharacterName::YUNA);
$members[] = new BlackMage(CharacterName::RULU);

$enemies = array();
$enemies[] = new Enemy(EnemyName::GOBLINS, 20);
$enemies[] = new Enemy(EnemyName::BOMB, 25);
$enemies[] = new Enemy(EnemyName::MORBOL, 30);



$turn = 1;
$isFinishFlg = false;

$messageObj = new Message;



while(!$isFinishFlg){
    echo "*** $turn ターン目 ***\n\n"; 

    $messageObj->displayStatusMessage($members);
    $messageObj->displayStatusMessage($enemies);

    // 仲間の攻撃
    $messageObj->displayAttackMessage($members, $enemies);
 
    // 敵の攻撃
    $messageObj->displayAttackMessage($enemies, $members);

    $isFinishFlg = isFinish($members);
    if($isFinishFlg){
        $message = "GAME OVER ....\n\n";
        break;
    }

    $isFinishFlg = isFinish(($enemies));
    if($isFinishFlg){
        $message = "♪♪♪ファンファーレ♪♪♪\n\n";
    }

    // echo $tiida->getName() . "　：　" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
    // echo $goblin->getName() . "　：　" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n";
    // echo "\n";
    // foreach($members as $member){
    //     echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";

    // }
    // echo "\n";
    // foreach($enemies as $enemy){
    //     echo $enemy->getName(). ":". $enemy->getHitPoint(). "/". $enemy::MAX_HITPOINT. "\n";

    // }

    // foreach($members as $member){
    //     // $enemyIndex = rand(0, count($enemies) -1);
    //     // $enemy = $enemies[$enemyIndex];

    //     if(get_class($member) == "WhiteMage"){
    //         // $member->doAttackWhiteMage($enemy, $member);
    //         $attackResult = $member->doAttackWhiteMage($enemies, $members);

    //     }else{
    //         // $member->doAttack($enemy);
    //         $attackResult = $member->doAttack($enemies);
    //     }
    //     echo "\n";
    // }
    // echo "\n";

    // foreach($enemies as $enemy){
    //     // $memberIndex = rand(0, count($members) -1);
    //     // $member = $members[$memberIndex];
    //     $enemy->doAttack($members);
    //     echo "\n";
    // }
    // echo "\n";

    // 仲間の全滅チェック
    // $deathCnt = 0;
    // foreach($members as $member){
    //     if($member->getHitPoint() > 0){
    //         $isFinishFlg = false;
    //         break;
    //     }
    //     $deathCnt++;
    // }

    // if($deathCnt === count($members)){
    //     $isFinishFlg = true;
    //     echo "GAME OVER ....\n\n";
    //     break;
    // }
    
    // // 敵の全滅チェック
    // $deathCnt = 0;
    // foreach($enemies as $enemy){
    //     if($enemy->getHitPoint() > 0){
    //         $isFinishFlg = false;
    //         break;
    //     }
    //     $deathCnt++;
    // }    

    // if ($deathCnt === count($enemies)) {
    //     $isFinishFlg = true;
    //     echo "♪♪♪ファンファーレ♪♪♪\n\n";
    //     break;
    // }
    
    // $tiida->doAttack($goblin);
    // echo "\n";
    // $goblin->doAttack($tiida);
    // echo "\n";
    $turn++;
}  

echo "★★★ 戦闘終了 ★★★\n\n";
echo $message;
// echo $tiida->getName(). "：". $tiida->getHitPoint(). "/". $tiida::MAX_HITPOINT. "\n";
// echo $goblin->getName() . "　：　" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n\n";

// foreach($members as $member){
//     echo $member->getName(). ":". $member->getHitPoint(). "/" . $member::MAX_HITPOINT . "\n";
// }
// echo "\n";
// foreach($enemies as $enemy){
//     echo $enemy->getName(). ":".  $enemy->getHitPoint(). "/" . $enemy::MAX_HITPOINT . "\n";
// }

$messageObj->displayStatusMessage($members);
$messageObj->displayStatusMessage($enemies);
