# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Address(models.Model):
    _name = 'civil.status.address'
    _description = 'Address Model'
    line_1_number_building = fields.Char('Buiding Name')
    line_2_number_street = fields.Char('Street Name')
    line_3_area_locality = fields.Char('Area Locality')
    city = fields.Many2one('city')
    state_province_country = fields.Many2one('civil.status.state.province')
    country = fields.Many2one('country')
    zip_postcode = fields.Integer()
    other_address_detail = fields.Char()
    bank_id = fields.Many2one('accounting.bank.branches')