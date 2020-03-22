# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetArchitecture(models.Model):
    _name = 'asset.architecture'
    _description = 'Asset Architecture Model'
    name = fields.Char('Architecture Name')
    address = fields.Char('Address')
    country = fields.Many2one('country')
    city = fields.Many2one('city')
    color = fields.Many2many('color')
    owner_id = fields.Many2one('res.partner', string='Owner')
    architecture_type_id = fields.Many2one('asset.architecture.type')
    state = fields.Selection([
        ('inuse', 'In Use'),
        ('rent', 'Rent'),
        ('lease', 'Lease'),
        ('active', 'Active'),
        ('damaged', 'Damaged'),
        ('upgrade', 'Upgrade')
    ], string='State')
    picture = fields.Image('Architecture Picture')
    established_day = fields.Date('Established Day')
class AssetArchitectureType(models.Model):
    _name = 'asset.architecture.type'
    _description = 'Asset Architecture Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')


    

  