# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class CashBook(models.Model):
    _name = 'cash.book'
    _description = 'Cash Book Model'
class CashBookType(models.Model):
    _name = 'cash.book.type'
    _description = 'Cash Book Type Model'