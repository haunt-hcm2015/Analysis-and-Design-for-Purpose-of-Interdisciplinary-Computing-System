# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Citizen(models.Model):
    _name = 'citizen'
    _description = 'Citizen Model'
    last_name = fields.Char('Last Name')
    middle_name = fields.Char('Middle Name')
    first_name = fields.Char('First Name')
    other_name = fields.Char('Other Name')
    date_of_birth = fields.Date('Date of Birth')
    gender = fields.Selection([
                                ('male', 'Male'), 
                                ('female', 'Female')
                            ])
    home_town = fields.Char('Home Town')
    nation    = fields.Char('Nation')
    religion  = fields.Char('Religion')
    image     = fields.Image('Image')
    phone_number = fields.Char('Phone Number')
    card_number_id = fields.Many2one(comodel_name='id.card', string="ID Card Number")
    household_id    = fields.Many2one(comodel_name='household.book', string="Household Book Number")
    
    


    