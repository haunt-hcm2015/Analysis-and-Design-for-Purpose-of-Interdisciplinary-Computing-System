# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Transaction(models.Model):
    _name = 'block.transaction'
    _description = 'Transaction Model'
    transaction_in_id = fields.Many2one('transaction.code.in', string='Transaction Input ID')
    transaction_out_id = fields.Many2one('transaction.code.out', string='Transaction Output ID')
    block_id = fields.Many2one('public.block', string='Block')
    version = fields.Char('Transaction Version')
    lock_time = fields.Datetime()
    time = fields.Datetime('Transaction Time')
    

  