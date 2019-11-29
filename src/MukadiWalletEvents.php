<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle;
/**
 * Class MukadiWalletEvents.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
class MukadiWalletEvents  
{
    const OPERATION_BEFORE_EXEC = "mukadi_wallet.op_before_exec";
    const OPERATION_AFTER_EXEC = "mukadi_wallet.op_after_exec";
    const WALLET_BEFORE_OPEN = "mukadi_wallet.wallet_before_open";
    const WALLET_AFTER_OPEN = "mukadi_wallet.wallet_after_open";
    const WALLET_BEFORE_CLOSE = "mukadi_wallet.wallet_before_close";
    const WALLET_AFTER_CLOSE = "mukadi_wallet.wallet_after_close";
    const AUTH_BEFORE_REDEMPTION = "mukadi_wallet.auth_before_redemption";
    const AUTH_AFTER_REDEMPTION = "mukadi_wallet.auth_after_redemption";
    const AUTH_BEFORE_REVERSAL = "mukadi_wallet.auth_before_reversal";
    const AUTH_AFTER_REVERSAL = "mukadi_wallet.auth_after_reversal";
    const TX_BEFORE_OPEN = "mukadi_wallet.tx_before_open";
    const TX_AFTER_OPEN = "mukadi_wallet.tx_after_open";
    const TX_BEFORE_CLOSE = "mukadi_wallet.tx_before_close";
    const TX_AFTER_CLOSE = "mukadi_wallet.tx_after_close";
}
