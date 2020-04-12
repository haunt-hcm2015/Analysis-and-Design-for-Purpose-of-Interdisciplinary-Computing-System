# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class BankBook(models.Model):
    _inherit = 'accounting.bank.book'
    _description = 'Bank Book Model'

