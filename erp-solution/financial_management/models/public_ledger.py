# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class PublicLedger(models.Model):
    _name = 'public.ledger'
    _description = 'Public Ledger Model'
    transaction_ids = fields.One2many('block.transaction', 'block_id',string='Transaction')
class Block(models.Model):
    _name = 'public.block'
    _description = 'Blockchain Model'
    version = fields.Char('Block Version')
    size = fields.Float('Block Size')
    hash_pre = fields.Char('Hash Previous')
    hash_merkle_root = fields.Char('Hash Merkle Root')
    nonce = fields.Integer()
    bits = fields.Integer()
    timestamp = fields.Datetime()
class TxIn(models.Model):
    _name = 'transaction.code.in'
    _description = 'Transaction Code Input Model'
    tx_id = fields.Char('Transaction Input ID')
    hash_pre_out = fields.Char('Hash Previous Out')
    index_pre_out = fields.Char('Index Previous Out')
    scripSig = fields.Char()
    sequence = fields.Char('Replace by fee')
    transaction_id = fields.Many2one('block.transaction', compute='compute_transaction', inverse='transaction_inverse')
    transaction_ids = fields.One2many('block.transaction', 'transaction_in_id')

    @api.depends('transaction_ids')
    def compute_transaction(self):
        if len(self.transaction_ids) > 0:
            self.transaction_id = self.transaction_ids[0]

    def transaction_inverse(self):
        if len(self.transaction_ids) > 0:
            transaction = self.env['block.transaction'].browse(self.transaction_ids[0].id)
            transaction.transaction_in_id = False
        self.transaction_id.transaction_in_id = self

class TxOut(models.Model):
    _name = 'transaction.code.out'
    _description = 'Transaction Code Output Model'
    tx_id = fields.Char('Transaction Output ID')
    index_out = fields.Char('Index Out')
    value = fields.Char('Transaction Value')
    script_pub_key = fields.Char('Script Public Key')
    address = fields.Char()
    unspent = fields.Boolean()
    transaction_id = fields.Many2one('block.transaction', compute='compute_transaction', inverse='transaction_inverse')
    transaction_ids = fields.One2many('block.transaction', 'transaction_out_id')

    @api.depends('transaction_ids')
    def compute_transaction(self):
        if len(self.transaction_ids) > 0:
            self.transaction_id = self.transaction_ids[0]

    def transaction_inverse(self):
        if len(self.transaction_ids) > 0:
            transaction = self.env['block.transaction'].browse(self.transaction_ids[0].id)
            transaction.transaction_out_id = False
        self.transaction_id.transaction_out_id = self
  