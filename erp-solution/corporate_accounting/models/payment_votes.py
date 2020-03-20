# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class PaymentVotes(models.Model):
    _name = 'accounting.payment.votes'
    _description = 'Accounting Payment Votes Model'