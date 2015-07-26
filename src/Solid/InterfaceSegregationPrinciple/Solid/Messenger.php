<?php

namespace Solid\InterfaceSegregationPrinciple\Solid;

interface Messenger extends InputMessenger, LoginMessenger, WithdrawalMessenger
{
}
