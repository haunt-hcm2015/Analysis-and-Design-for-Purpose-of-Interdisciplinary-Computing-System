# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class BankBook(models.Model):
    _name = 'medical.bank.book'
    _description = 'Bank Book Model'
class BankBookType(models.Model):
    _name = 'medical.bank.book.type'
    _description = 'Bank Book Type Model'
