# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class HouseholdBook(models.Model):
    _name = 'household.book'
    _description = 'Household Book Model'
    _rec_name = 'household_book_number'
    household_book_number = fields.Char('Household Book Number')
    country         = fields.Char('Country')
    state           = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])
    citizen_ids      = fields.One2many('citizen', 'household_id')
