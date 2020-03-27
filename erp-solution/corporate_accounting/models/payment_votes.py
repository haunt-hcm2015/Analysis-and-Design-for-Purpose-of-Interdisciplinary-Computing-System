# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class PaymentVotes(models.Model):
    _name = 'accounting.payment.votes'
    _description = 'Accounting Payment Votes Model'
    payment_status_id = fields.Many2one('accounting.payment.status', string='Payment Status')
    payment_method_id = fields.Many2one('accounting.payment.method', string='Payment Method')
    account_id = fields.Many2one('accounting.account', string='Account')
    currency_id = fields.Many2one('accounting.currency', string='Currency')
    counter_party_id = fields.Many2one('accounting.transaction.parties', string='Counter Party')
    party_id = fields.Many2one('accounting.transaction.parties', string='Party')
    date_of_payment = fields.Date()
    amount = fields.Float('Amount of Payment')
    amex_number = fields.Integer('American Express Number')
    contactless_number = fields.Integer('Contactless Card Number')
    credit_number = fields.Integer('Credit Card Number')
    debit_number = fields.Integer('Debit Card Number')
    visa_number = fields.Integer('Visa Card Number')
    mastercard_number = fields.Integer('Mastercard Number')
    paypal_number = fields.Integer('Paypal Number')
    payoneer_number = fields.Integer('Payoneer Number')
class PaymentStatus(models.Model):
    _name = 'accounting.payment.status'
    _description = 'Accounting Payment Status Model'
    name = fields.Char('Status Name')
    description = fields.Char('Status Description')
class PaymentMethod(models.Model):
    _name = 'accounting.payment.method'
    _description = 'Accounting Payment Method Model'
    name = fields.fields.Selection([
                                    ('amex', 'American Express'),
                                    ('cash', 'Cash'),
                                    ('contactless', 'Contactless Card'),
                                    ('credit', 'Credit Card'),
                                    ('debit', 'Debit Card'),
                                    ('visa', 'Visa'),
                                    ('mastercard', 'Mastercard'),
                                    ('paypal', 'Paypal'),
                                    ('payoneer', 'Payoneer')
                                ], string='Method Name')
    description = fields.Char('Status Description')