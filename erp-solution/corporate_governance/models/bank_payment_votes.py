# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class BankPaymentVotes(models.Model):
    _name = 'governance.bank.payment.votes'
    _description = 'Bank Payment Votes Model'
    title = fields.Char()
    payment_number = fields.Integer()
    bank_card_id = fields.Many2one('governance.credit', string='Credit Card')
    owner_ids = fields.Many2one('res.partner', string='Account Owner')
    balance = fields.Float()
    payment_method = fields.Selection([
        ('credit_card','Credit Card'),
        ('debit_card','Debit Card'),
        ('visa','Visa'),
        ('masterCard','MasterCard'),
        ('amex','American Express')
    ], string='Payment Method')
    product_ids = fields.Many2many('product.product', string="Product")
    contract_id = fields.Many2one('accounting.contraction', string='Contract')
    expire_date = fields.Date()
    payment_date = fields.Date()



  