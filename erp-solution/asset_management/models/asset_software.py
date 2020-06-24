# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetSoftware(models.Model):
    _name = 'asset.software'
    _description = 'Asset Software Model'
    name = fields.Char('Software Name')
    owner_id = fields.Many2one('res.partner', string='Owner')
    seller_id = fields.Many2one('res.partner', string='Seller')
    software_type_id = fields.Many2one('asset.software.type')
    state = fields.Selection([
        ('inuse', 'In Use'),
        ('rent', 'Rent'),
        ('lease', 'Lease'),
        ('active', 'Active'),
        ('upgrade', 'Upgrade')
    ], string='State')
    picture = fields.Image('Software Picture')
    date_of_purchase = fields.Date('Date of Purchase')

class AssetSoftwareType(models.Model):
    _name = 'asset.software.type'
    _description = 'Asset Software Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
  