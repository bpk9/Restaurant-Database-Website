#!/bin/bash 

USERNAME="bpk9"

scp -P 1855 *.{php,css} $USERNAME@cmpsc431-s3-g-10.vmhost.psu.edu:/var/www/html