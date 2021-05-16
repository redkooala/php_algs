<?php

namespace Algo;



class TreeNode {
     public $val = null;
      public $left = null;
      public $right = null;
      function __construct($val = 0, $left = null, $right = null) {
          $this->val = $val;
          $this->left = $left;
         $this->right = $right;
      }
 }

class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum(TreeNode $root, int $targetSum): bool
    {
        $left = new TreeNode(4, new TreeNode(11, new TreeNode(7), new TreeNode(2)), null);
        $right = new TreeNode(8, new TreeNode(13), new TreeNode(4, null, new TreeNode(1)));

        $root = new TreeNode(5, $left, $right);

        $paths = $this->parsePaths($root);

        print_r($paths);
        die;

        return false;
    }

    function parsePaths(?TreeNode $node): array
    {
       if (!$node) return [];

       if ($node->left === null) {
           return array_merge([$node->val], array_merge($this->parsePaths($node->right)));
       }
       if ($node->right === null) {
           return  array_merge([$node->val], array_merge($this->parsePaths($node->left)));
       } else {
           $paths = [];
           $paths[] = array_merge([$node->val], array_merge($this->parsePaths($node->left)));
           $paths[] = array_merge([$node->val], array_merge($this->parsePaths($node->right)));
       }

       return ($paths);
    }

    function test(array $paths) {
        $sums = [];
        foreach ($paths as $path) {
            $sum = 0;
            if (is_array($paths)) {
                  $sums[] = $sum + $this->test($path);
            }
            $sum += $path;
        }
        return $sums;
    }

}


 $left = new TreeNode(4, new TreeNode(11, new TreeNode(7), new TreeNode(2)), null);
 $right = new TreeNode(8, new TreeNode(13), new TreeNode(4, null, new TreeNode(1)));

 $root = new TreeNode(5, $left, $right);
 $s = new Solution();
 var_dump($s->hasPathSum($root, 22));
