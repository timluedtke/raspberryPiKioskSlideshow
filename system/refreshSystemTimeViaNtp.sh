#!/bin/bash
/etc/init.d/ntp stop
ntpdate ptbtime1.ptb.de
/etc/init.d/ntp start