# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class IDCard(models.Model):
    _name = 'id.card'
    _description = 'ID Card Model'
    _rec_name = 'id_card_number'
    id_card_number = fields.Char('ID Card Number')
    date_of_issue  = fields.Date('Date of Issue')
    date_of_change = fields.Date('Date of Change')
    card_type_id   = fields.Many2one('id.card.type', string="ID Card Type")
    place_id       = fields.Many2one('place.of.issue', string="Place of Issue")
    citizen_id     = fields.Many2one('citizen', string='Citizen')
class PlaceOfIssue(models.Model):
    _name = 'place.of.issue'
    _description = 'Place of Issue of ID Card'
    place_name   = fields.Char('Place of Issue')
    address      = fields.Char('Address')
    phone_number = fields.Char('Phone Number')
class IDCardType(models.Model):
    _name = 'id.card.type'
    _description = 'ID Card Type Model'
    name    = fields.Char('Type Name')
    description = fields.Char()
