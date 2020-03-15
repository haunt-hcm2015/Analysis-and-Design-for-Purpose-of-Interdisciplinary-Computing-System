# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class IDCard(models.Model):
    _name = 'id.card'
    _description = 'ID Card Model'
    _rec_name = 'id_card_number'
    id_card_number = fields.Char('ID Card Number')
    date_of_issue  = fields.Date('Date of Issue')
    date_of_change = fields.Date('Date of Change')
    card_type_id   = fields.Many2one(comodel_name='id.card.type', string="ID Card Type")
    place_id       = fields.Many2one(comodel_name='place.of.issue', string="Place of Issue")
    citizen_id     = fields.Many2one(comodel_name='citizen')
    citizen_ids    = fields.One2many(comodel_name='citizen', inverse_name='card_number_id')
class PlaceOfIssue(models.Model):
    _name = 'place.of.issue'
    _description = 'Place of Issue of ID Card'
    place_name   = fields.Char('Place of Issue')
    address      = fields.Char('Address')
    phone_number = fields.Char('Phone Number')
class IDCardType(models.Model):
    _name = 'id.card.type'
    _description = 'ID Card Type Model'
    _rec_name    = 'type_name'
    type_name    = fields.Char('Type Name')
